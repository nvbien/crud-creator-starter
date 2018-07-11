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
    
    class DeleteFileAction {
        public function __construct() {
        }
        
        public function execute( $url ) {
            $path = str_replace( url( '/' ) . '/files/', '', $url );
            
            return \Storage::disk( 'local' )->delete( $path );
        }
    }