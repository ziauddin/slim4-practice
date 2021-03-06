<?php

// Define app routes

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Tuupola\Middleware\HttpBasicAuthentication;

return function (App $app) {
    // Redirect to Swagger documentation
    $app->get('/', \App\Action\Home\HomeAction::class)->setName('home');

    // Swagger API documentation
    $app->get('/docs/v1', \App\Action\OpenApi\Version1DocAction::class)->setName('docs');

    // Password protected area
    $app->group(
        '/api/v1',
        function (RouteCollectorProxy $app) {
            // die(var_dump($app->getContainer()->get('settings')));

            $app->get('/users', \App\Action\User\UserFindAction::class);
            $app->post('/users', \App\Action\User\UserCreateAction::class);
            $app->get('/users/{user_id}', \App\Action\User\UserReadAction::class);
            $app->put('/users/{user_id}', \App\Action\User\UserUpdateAction::class);
            $app->delete('/users/{user_id}', \App\Action\User\UserDeleteAction::class);
            // kitab
            $app->get('/kitabs', \App\Action\Kitab\KitabFindAction::class)->setName('kitabs');
            $app->post('/kitabs', \App\Action\Kitab\KitabCreateAction::class)->setName('create-kitab');
            $app->get('/kitabs/{kitab_id}', \App\Action\Kitab\KitabReadAction::class)->setName('get-kitab');
            $app->put('/kitabs/{kitab_id}', \App\Action\Kitab\KitabUpdateAction::class)->setName('update-kitab');
            $app->delete('/kitabs/{kitab_id}', \App\Action\Kitab\KitabDeleteAction::class)->setName('delete-kitab');
            // hayatus sahaba
            $app->get('/hayatus-sahabas', \App\Action\HayatusSahaba\HayatusSahabaFindAction::class)->setName('hayatusSahabas');
            $app->post('/hayatus-sahabas', \App\Action\HayatusSahaba\HayatusSahabaCreateAction::class)->setName('create-hayatusSahaba');
            $app->get('/hayatus-sahabas/{hsid}', \App\Action\HayatusSahaba\HayatusSahabaReadAction::class)->setName('hayatusSahaba');
            $app->put('/hayatus-sahabas/{hsid}', \App\Action\HayatusSahaba\HayatusSahabaUpdateAction::class)->setName('update-hayatusSahaba');
            $app->delete('/hayatus-sahabas/{hsid}', \App\Action\HayatusSahaba\HayatusSahabaDeleteAction::class)->setName('del-hayatusSahaba');
            $app->map(['POST', 'GET'], '/hayatus-sahabas-with-chapters', \App\Action\HayatusSahaba\HayatusSahabaWithChapterAction::class)->setName('hayatusSahabaAll');
            // hayatus sahaba chapter
            $app->get('/hayatus-sahaba-chapters', \App\Action\HayatusSahabaChapter\HayatusSahabaChapterFindAction::class)->setName('hSChapters');
            $app->post('/hayatus-sahaba-chapters', \App\Action\HayatusSahabaChapter\HayatusSahabaChapterCreateAction::class)->setName('create-hSChapter');
            $app->get('/hayatus-sahaba-chapters/{hscid}', \App\Action\HayatusSahabaChapter\HayatusSahabaChapterReadAction::class)->setName('read-hSChapter');
            $app->put('/hayatus-sahaba-chapters/{hscid}', \App\Action\HayatusSahabaChapter\HayatusSahabaChapterUpdateAction::class)->setName('up-hSChapter');
            $app->delete('/hayatus-sahaba-chapters/{hscid}', \App\Action\HayatusSahabaChapter\HayatusSahabaChapterDeleteAction::class)->setName('del-hSChapter');

            // jiboni kitab
            $app->get('/jibonis', \App\Action\Jiboni\JiboniFindAction::class)->setName('jibonis');
            $app->post('/jibonis', \App\Action\Jiboni\JiboniCreateAction::class)->setName('create-jiboni');
            $app->get('/jibonis/{jiboni_id}', \App\Action\Jiboni\JiboniReadAction::class)->setName('get-jiboni');
            $app->put('/jibonis/{jiboni_id}', \App\Action\Jiboni\JiboniUpdateAction::class)->setName('update-jiboni');
            $app->delete('/jibonis/{jiboni_id}', \App\Action\Jiboni\JiboniDeleteAction::class)->setName('delete-jiboni');

            // app-infos
            $app->get('/app-infos', \App\Action\AppInfo\AppInfoFindAction::class)->setName('appInfos');
            $app->post('/app-infos', \App\Action\AppInfo\AppInfoCreateAction::class)->setName('create-appInfo');
            $app->get('/app-infos/{appInfo_id}', \App\Action\AppInfo\AppInfoReadAction::class)->setName('get-appInfo');
            $app->put('/app-infos/{appInfo_id}', \App\Action\AppInfo\AppInfoUpdateAction::class)->setName('update-appInfo');
            $app->delete('/app-infos/{appInfo_id}', \App\Action\AppInfo\AppInfoDeleteAction::class)->setName('delete-appInfo');

            // volume-list
            $app->get('/volume-lists', \App\Action\VolumeList\VolumeListFindAction::class)->setName('volumeLists');
            $app->post('/volume-lists', \App\Action\VolumeList\VolumeListCreateAction::class)->setName('create-volumeList');
            $app->get('/volume-lists/{volumeList_id}', \App\Action\VolumeList\VolumeListReadAction::class)->setName('get-volumeList');
            $app->put('/volume-lists/{volumeList_id}', \App\Action\VolumeList\VolumeListUpdateAction::class)->setName('update-volumeList');
            $app->delete('/volume-lists/{volumeList_id}', \App\Action\VolumeList\VolumeListDeleteAction::class)->setName('delete-volumeList');

            // chapter-lists
            $app->get('/chapter-lists', \App\Action\ChapterList\ChapterListFindAction::class)->setName('chapterLists');
            $app->post('/chapter-lists', \App\Action\ChapterList\ChapterListCreateAction::class)->setName('create-chapterList');
            $app->get('/chapter-lists/{chapterList_id}', \App\Action\ChapterList\ChapterListReadAction::class)->setName('get-chapterList');
            $app->put('/chapter-lists/{chapterList_id}', \App\Action\ChapterList\ChapterListUpdateAction::class)->setName('update-chapterList');
            $app->delete('/chapter-lists/{chapterList_id}', \App\Action\ChapterList\ChapterListDeleteAction::class)->setName('delete-chapterList');

            // book-lists
            $app->get('/book-lists', \App\Action\BookList\BookListFindAction::class)->setName('bookLists');
            $app->post('/book-lists', \App\Action\BookList\BookListCreateAction::class)->setName('create-bookList');
            $app->get('/book-lists/{bookList_id}', \App\Action\BookList\BookListReadAction::class)->setName('get-bookList');
            $app->put('/book-lists/{bookList_id}', \App\Action\BookList\BookListUpdateAction::class)->setName('update-bookList');
            $app->delete('/book-lists/{bookList_id}', \App\Action\BookList\BookListDeleteAction::class)->setName('delete-bookList');

            // book-content
            $app->map(['POST', 'GET'], '/book-contents', \App\Action\BookContent\BookContentFindAction::class)->setName('bookContents');
            $app->post('/create-book-contents', \App\Action\BookContent\BookContentCreateAction::class)->setName('create-bookContent');
            $app->get('/book-contents/{bookContent_id}', \App\Action\BookContent\BookContentReadAction::class)->setName('get-bookContent');
            $app->put('/book-contents/{bookContent_id}', \App\Action\BookContent\BookContentUpdateAction::class)->setName('update-bookContent');
            $app->delete('/book-contents/{bookContent_id}', \App\Action\BookContent\BookContentDeleteAction::class)->setName('delete-bookContent');
        }
    )->add(HttpBasicAuthentication::class);
};
