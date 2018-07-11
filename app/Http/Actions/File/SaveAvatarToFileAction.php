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
    
    class SaveAvatarToFileAction extends BaseFileAction {
        public function execute( $avatarFile, $type ) {
            $extension = $avatarFile->getClientOriginalExtension();
            
            $path = ' FILE_CATEGORY_LOGO . /' . $type . '_' . Str::random( 10 ) . '.' . $extension;
            $success = \Storage::disk( 'local' )->put( $path, file_get_contents( $avatarFile ) );
            
            return url( '/' ) . '/files/' . $path;
        }
    }