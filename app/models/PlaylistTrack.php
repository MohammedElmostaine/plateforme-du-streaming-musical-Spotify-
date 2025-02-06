<?php

class PlaylistTrack {
    private int $playlistId;
    private int $trackId;

    public function __construct($playlistId, $trackId){
        $this->playlistId = $playlistId;
        $this->trackId = $trackId;
    }


}