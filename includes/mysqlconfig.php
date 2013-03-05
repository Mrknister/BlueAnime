<?php
function connect_with_user($username,$password)
{
    $mysqli = mysqli_connect("127.0.0.1", $username, $password, "BlueAnime");
    if ($mysqli->errno)
    {
        die( "Failed to connect to MySQL: " . $mysqli->error);
    }
    return $mysqli;
}

function connect_with_animereader()
{
    return connect_with_user( "AnimeReader", "5oqvENa0Xe2h5Wsa");
}
function connect_with_animewriter()
{
    return connect_with_user( "AnimeWriter", "3aj5YVvxDeEDDkDv");
}
function connect_with_episodereader()
{
    return connect_with_user( "FolgenReader", "Za9KrNETaXtzinjj");
}

function connect_with_episodewriter()
{
    return connect_with_user( "EpisodeWriter", "gMwLZyxvETDOCm8U");
}

function connect_with_userreader()
{
    return connect_with_user( "UserReader", "ziEZRpEZNINpvPYV");
}

function connect_with_userwriter()
{
    return connect_with_user( "UserWriter", "biZTTSTL4tQwmfc5");
}

function connect_with_queuewriter()
{
    return connect_with_user( "QueueWriter", "WZO4YzmFK97qXCul");
}

function connect_with_queuereader()
{
    return connect_with_user( "QueueReader", "BxLdqChAgTTIAD4v");
}

function connect_with_messagesreader()
{
    return connect_with_user( "MessagesReader", "mJ0y52DpNb4FpUKz");
}

function connect_with_messageswriter()
{
    return connect_with_user( "MessagesWriter", "H8Ndd35RPIcP9LOk");
}

?>

























