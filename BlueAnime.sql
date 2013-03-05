
create user 'AnimeReader'@'localhost' identified by '5oqvENa0Xe2h5Wsa';
create user 'AnimeWriter'@'localhost' identified by '3aj5YVvxDeEDDkDv';
create user 'FolgenReader'@'localhost' identified by 'Za9KrNETaXtzinjj';
create user 'EpisodeWriter'@'localhost' identified by 'gMwLZyxvETDOCm8U';
create user 'UserReader'@'localhost' identified by 'ziEZRpEZNINpvPYV';
create user 'UserWriter'@'localhost' identified by 'biZTTSTL4tQwmfc5';
create user 'QueueWriter'@'localhost' identified by 'WZO4YzmFK97qXCul';
create user 'QueueReader'@'localhost' identified by 'BxLdqChAgTTIAD4v';
create user 'MessagesReader'@'localhost' identified by 'mJ0y52DpNb4FpUKz';
create user 'MessagesWriter'@'localhost' identified by 'H8Ndd35RPIcP9LOk';




grant select on BlueAnime.Serien to 'AnimeWriter'@'localhost';
grant insert on BlueAnime.Serien to 'AnimeWriter'@'localhost';
grant update on BlueAnime.Serien to 'AnimeWriter'@'localhost';
grant delete on BlueAnime.Serien to 'AnimeWriter'@'localhost';
grant insert on BlueAnime.SerieInGenre to 'AnimeWriter'@'localhost';

grant insert on BlueAnime.Folgen to 'EpisodeWriter'@'localhost';
grant update on BlueAnime.Folgen to 'EpisodeWriter'@'localhost';

grant select on BlueAnime.Serien to 'AnimeReader'@'localhost';
grant select on BlueAnime.Genres to 'AnimeReader'@'localhost';
grant select on BlueAnime.SerieInGenre to 'AnimeReader'@'localhost';

grant select on BlueAnime.Folgen to 'FolgenReader'@'localhost';
grant select on BlueAnime.Serien to 'FolgenReader'@'localhost';

grant select on BlueAnime.Users to 'UserReader'@'localhost';
grant select on BlueAnime.Verificationqueue to 'UserReader'@'localhost';
grant insert on BlueAnime.Users to 'UserWriter'@'localhost';

grant select on BlueAnime.Verificationqueue to 'QueueReader'@'localhost';

grant insert on BlueAnime.Verificationqueue to 'QueueWriter'@'localhost';
grant delete on BlueAnime.Verificationqueue to 'QueueWriter'@'localhost';
grant select on BlueAnime.Verificationqueue to 'QueueWriter'@'localhost';

grant select on BlueAnime.News to 'MessagesReader'@'localhost';
grant select on BlueAnime.News to 'MessagesWriter'@'localhost';
grant update on BlueAnime.News to 'MessagesWriter'@'localhost';
grant insert on BlueAnime.News to 'MessagesWriter'@'localhost';

grant select on BlueAnime.ChatMessages to 'MessagesReader'@'localhost';
grant select on BlueAnime.ChatMessages to 'MessagesWriter'@'localhost';
grant update on BlueAnime.ChatMessages to 'MessagesWriter'@'localhost';
grant insert on BlueAnime.ChatMessages to 'MessagesWriter'@'localhost';

flush privileges;

use BlueAnime;

