<?php
    /**
     * Created by PhpStorm.
     * User: vuho
     * Date: 1/17/18
     * Time: 4:20 PM
     */
    
    namespace App\Http\Actions\File;
    
    
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
    
    class BaseFileAction {
        /* @var DeleteFileAction */
        private $deleteFileAction;
        
        public function __construct( DeleteFileAction $deleteFileAction ) {
            $this->deleteFileAction = $deleteFileAction;
        }
        
        public function executeToDelete( $path ) {
            $this->deleteFileAction->execute( $path );
        }
    }