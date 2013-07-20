<?php

class HelperFactory {
    static function getFinder( $type ) {
        $mapper = "{$type}Mapper";
        if ( class_exists( $mapper ) ) {
            return new $mapper();
        }
        throw new AppException( "Unknown: $mapper" );
    }

    static function getCollection( $type ) {
        $collection = "{$type}Collection";
        if ( class_exists( $collection ) ) {
            return new $collection();
        }
        throw new AppException( "Unknown: $collection" );
    }
}
?>