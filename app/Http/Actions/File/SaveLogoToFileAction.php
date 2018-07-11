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
    
    class SaveLogoToFileAction extends BaseFileAction {
        public function execute( $logoFile ) {
            $extension = $logoFile->getClientOriginalExtension();
            
            $path ='avatar/company_' . Str::random( 10 ) . '.' . $extension;
            
            $success = \Storage::disk( 'local' )->put( $path, file_get_contents( $logoFile ) );
            
            return url( '/' ) . '/files/' . $path;
        }
    }