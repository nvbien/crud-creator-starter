<?php
    /**
     * Created by PhpStorm.
     * User: vuho
     * Date: 3/17/18
     * Time: 10:38 AM
     */
    if ( ! function_exists( 'pemFile' ) ) {
        function pemFile() {
            return \Illuminate\Support\Facades\Storage
                ::disk( 'local' )
                ->path('pem/dev/ev.pem');
        }
    }
    if ( ! function_exists( 'push_web' ) ) {
        function push_web( $data, $user_id ) {
            $pusher = new Pusher\Pusher(
                config( 'services.pusher.key' ),
                config( 'services.pusher.secret' ),
                config( 'services.pusher.id' ),
                [
                    'cluster'   => config( 'services.pusher.cluster' ),
                    'encrypted' => true
                ]
            );
            
            $pusher->trigger( 'stb', 'stb-push-notify-' . $user_id, $data );
        }
    }
