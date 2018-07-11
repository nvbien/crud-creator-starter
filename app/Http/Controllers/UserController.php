<?php
    
    namespace App\Http\Controllers;
    
    use App\DataTables\UserDataTable;
    use App\Http\Actions\File\SaveAvatarToFileAction;
    use App\Http\Requests;
    use App\Http\Requests\CreateUserRequest;
    use App\Http\Requests\UpdateUserRequest;
    use App\Models\Role;
    use App\Notifications\NewUser;
    use App\Repositories\RoleRepository;
    use App\Repositories\UserRepository;
    use Flash;
    use App\Http\Controllers\AppBaseController;
    use Illuminate\Auth\Passwords\PasswordBroker;
    use Illuminate\Auth\Passwords\TokenRepositoryInterface;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Response;
    
    class UserController extends AppBaseController {
        /** @var  UserRepository */
        private $userRepository;
        /** @var  RoleRepository */
        private $roleRepository;
        
        private $_token_repository;
        /** @var  SaveAvatarToFileAction */
        private $saveAvatarToFileAction;
        
        public function __construct(
            UserRepository $userRepo,
            RoleRepository $roleRepo,
            PasswordBroker $token,
            SaveAvatarToFileAction $saveAvatarToFileAction
        ) {
            $this->userRepository         = $userRepo;
            $this->roleRepository         = $roleRepo;
            $this->_token_repository      = $token;
            $this->saveAvatarToFileAction = $saveAvatarToFileAction;
        }
        
        /**
         * Display a listing of the User.
         *
         * @param UserDataTable $userDataTable
         *
         * @return Response
         */
        public function index( UserDataTable $userDataTable ) {
            return $userDataTable->render( 'users.index' );
        }
        
        /**
         * Show the form for creating a new User.
         *
         * @return Response
         */
        public function create() {
            return view( 'users.create' );
        }
        
        /**
         * Store a newly created User in storage.
         *
         * @param CreateUserRequest $request
         *
         * @return Response
         */
        public function store( CreateUserRequest $request ) {
            $input = $request->all();
            
            if ( $input['password'] ) {
                $input['password'] = Hash::make( $input['password'] );
            }
            
            if ( $request->hasFile( 'avatar' ) && $request->file( 'avatar' )->isValid() ) {
                $logoFile        = $request->file( 'avatar' );
                $logoPath        = $this->saveAvatarToFileAction->execute( $logoFile, 'user' );
                $input['avatar'] = $logoPath;
            } else {
                unset( $input['avatar'] );
            }
            
            $user = $this->userRepository->create( $input );
            
            Flash::success( 'User saved successfully.' );
            $token = $this->_token_repository->createToken( $user );
            $user->notify( new NewUser( $token ) );
            
            return redirect( route( 'users.index' ) );
        }
        
        public function getPassword() {
            return view( 'users.password' );
        }
        
        public function postPassword( Request $request ) {
            
            $data      = $request->all();
            $errmsg    = [];
            $validator = \Validator::make( $data, [
                'old_password'     => 'string|min:6|max:60|required',
                'password'         => 'string|min:6|max:60|required|different:old_password',
                'confirm_password' => 'string|min:6|max:60|required|same:password'
            ] );
            $user      = \Auth::user();
            if ( $validator->fails() ) {
                $errmsg = $validator->errors()->all();
            } elseif ( ! \Hash::check( $data['old_password'], $user->getAuthPassword() ) ) {
                $errmsg = [ 'Old password doesn\'t match please try again!' ];
            } else {
                $user->password = \Hash::make( $data['password'] );
                $user->save();
            }
            if ( count( $errmsg ) > 0 ) {
                return view( 'users.password' )->withErrors( $errmsg );
            } else {
                
                return view( 'users.password', [ 'message' => "Your password was changed!" ] );
            }
        }
        
        /**
         * Display the specified User.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function show( $id ) {
            $user = $this->userRepository->findWithoutFail( $id );
            
            if ( empty( $user ) ) {
                Flash::error( 'User not found' );
                
                return redirect( route( 'users.index' ) );
            }
            
            if ( $user['role_id'] ) {
                $group = $this->roleRepository->findWithoutFail( $user['role_id'] );
                
                if ( ! empty( $group ) ) {
                    $user['role'] = $group['name'];
                }
            }
            
            return view( 'users.show' )->with( 'user', $user );
        }
        
        /**
         * Show the form for editing the specified User.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function edit( $id ) {
            $user = $this->userRepository->findWithoutFail( $id );
            
            if ( empty( $user ) ) {
                Flash::error( 'User not found' );
                
                return redirect( route( 'users.index' ) );
            }
            
            return view( 'users.edit' )->with( 'user', $user );
        }
        
        /**
         * Update the specified User in storage.
         *
         * @param  int $id
         * @param UpdateUserRequest $request
         *
         * @return Response
         */
        public function update( $id, UpdateUserRequest $request ) {
            $user = $this->userRepository->findWithoutFail( $id );
            
            if ( empty( $user ) ) {
                Flash::error( 'User not found' );
                
                return redirect( route( 'users.index' ) );
            }
            $input = $request->all();
            $role = $user->role;
            
            if ( $input['password'] ) {
                $input['password'] = \Hash::make( $input['password'] );
            } else {
                unset($input['password']);
            }
            if ( $role ) {
                $input['permissions'] = $role->permissions;
            }
    
            if ( $request->hasFile( 'avatar' ) && $request->file( 'avatar' )->isValid() ) {
                $input['avatar'] = $this->saveAvatarToFileAction->execute( $request->file( 'avatar' ), 'bus' );
        
                if ( key_exists( 'current_avatar', $input ) ) {
                    $this->saveAvatarToFileAction->executeToDelete( $input['current_avatar'] );
                    unset( $input['current_avatar'] );
                }
            } else {
                unset( $input['avatar'] );
            }
            
            $user = $this->userRepository->update( $input, $id );
            
            Flash::success( 'User updated successfully.' );
            
            return redirect( route( 'users.index' ) );
        }
        
        /**
         * Remove the specified User from storage.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function destroy( $id ) {
            $user = $this->userRepository->findWithoutFail( $id );
            
            if ( empty( $user ) ) {
                Flash::error( 'User not found' );
                
                return redirect( route( 'users.index' ) );
            }
            
            $this->userRepository->delete( $id );
            
            Flash::success( 'User deleted successfully.' );
            
            return redirect( route( 'users.index' ) );
        }
    }
