<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
helper('auth');

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index', ['as' => 'home']);
$routes->get('book/(:segment)', 'HomeController::showBookDetail/$1', ['as' => 'main-book-detail']);
$routes->group('book', ['filter' => 'role:user,administrator'], function ($routes) {
    $routes->get('(:segment)/checkout', 'CheckoutController::show/$1', ['as' => 'checkout']);
    $routes->post('checkout', 'CheckoutController::checkout', ['as' => 'create-checkout']);
});

$routes->get('orders', 'CheckoutController::index', ['filter' => 'role:user,administrator']);

$routes->group('dashboard', ['filter' => 'role:administrator'], function ($routes) {

    // User
    $routes->group('users', function ($routes) {
        $routes->get('/', 'UserController::index', ['as' => 'users']);
        $routes->get('new', 'UserController::new', ['as' => 'user-new']);
        $routes->post('/', 'UserController::create', ['as' => 'user-create']);
        $routes->get('(:segment)/edit', 'UserController::edit/$1', ['as' => 'user-edit']);
        $routes->put('(:segment)', 'UserController::update/$1', ['as' => 'user-update']);
        $routes->delete('(:segment)', 'UserController::delete/$1', ['as' => 'user-delete']);
    });

    // Genre
    $routes->group('genres', function ($routes) {
        $routes->get('/', 'GenreController::index', ['as' => 'genres']);
        $routes->get('new', 'GenreController::new', ['as' => 'genre-new']);
        $routes->post('/', 'GenreController::create', ['as' => 'genre-create']);
        $routes->get('(:segment)/edit', 'GenreController::edit/$1', ['as' => 'genre-edit']);
        $routes->put('(:segment)', 'GenreController::update/$1', ['as' => 'genre-update']);
        $routes->delete('(:segment)', 'GenreController::delete/$1', ['as' => 'genre-delete']);
    });

    // Author
    $routes->group('authors', function ($routes) {
        $routes->get('/', 'AuthorController::index', ['as' => 'authors']);
        $routes->get('new', 'AuthorController::new', ['as' => 'author-new']);
        $routes->post('/', 'AuthorController::create', ['as' => 'author-create']);
        $routes->get('(:segment)/edit', 'AuthorController::edit/$1', ['as' => 'author-edit']);
        $routes->put('(:segment)', 'AuthorController::update/$1', ['as' => 'author-update']);
        $routes->delete('(:segment)', 'AuthorController::delete/$1', ['as' => 'author-delete']);
    });

    // Publisher
    $routes->group('publishers', function ($routes) {
        $routes->get('/', 'PublisherController::index', ['as' => 'publishers']);
        $routes->get('new', 'PublisherController::new', ['as' => 'publisher-new']);
        $routes->post('/', 'PublisherController::create', ['as' => 'publisher-create']);
        $routes->get('(:segment)/edit', 'PublisherController::edit/$1', ['as' => 'publisher-edit']);
        $routes->put('(:segment)', 'PublisherController::update/$1', ['as' => 'publisher-update']);
        $routes->delete('(:segment)', 'PublisherController::delete/$1', ['as' => 'publisher-delete']);
    });

    // Book
    $routes->group('books', function ($routes) {
        $routes->get('/', 'BookController::index', ['as' => 'books']);
        $routes->get('new', 'BookController::new', ['as' => 'book-new']);
        $routes->post('/', 'BookController::create', ['as' => 'book-create']);
        $routes->get('(:segment)/edit', 'BookController::edit/$1', ['as' => 'book-edit']);
        $routes->put('(:segment)', 'BookController::update/$1', ['as' => 'book-update']);
        $routes->delete('(:segment)', 'BookController::delete/$1', ['as' => 'book-delete']);
    });

    // Sale
    $routes->group('sales', function ($routes) {
        $routes->get('/', 'SaleController::index', ['as' => 'sales']);
        $routes->get('(:segment)', 'SaleController::show/$1', ['as' => 'sale-show']);
        $routes->put('(:segment)', 'SaleController::update/$1', ['as' => 'sale-update']);
    });

    // CV
    $routes->group('cv', function ($routes) {
        $routes->get('/', 'CVController::index', ['as' => 'cv']);
        $routes->get('basic-info', 'CVController::basic_info', ['as' => 'cv-basic-info']);
        $routes->post('/', 'CVController::store_basic_info', ['as' => 'cv-basic-create']);
        $routes->put('(:segment)', 'CVController::update_basic_info/$1', ['as' => 'cv-basic-update']);
        $routes->get('excel', 'CVController::exportExcel', ['as' => 'export-excel']);
        
        // Education
        $routes->group('education', function ($routes) {
            $routes->get('/', 'EducationController::index', ['as' => 'educations']);
            $routes->get('new', 'EducationController::new', ['as' => 'education-new']);
            $routes->post('/', 'EducationController::create', ['as' => 'education-create']);
            $routes->get('(:segment)/edit', 'EducationController::edit/$1', ['as' => 'education-edit']);
            $routes->put('(:segment)', 'EducationController::update/$1', ['as' => 'education-update']);
            $routes->delete('(:segment)', 'EducationController::delete/$1', ['as' => 'education-delete']);
        });

        // Work
        $routes->group('work', function ($routes) {
            $routes->get('/', 'WorkController::index', ['as' => 'works']);
            $routes->get('new', 'WorkController::new', ['as' => 'work-new']);
            $routes->post('/', 'WorkController::create', ['as' => 'work-create']);
            $routes->get('(:segment)/edit', 'WorkController::edit/$1', ['as' => 'work-edit']);
            $routes->put('(:segment)', 'WorkController::update/$1', ['as' => 'work-update']);
            $routes->delete('(:segment)', 'WorkController::delete/$1', ['as' => 'work-delete']);
        });

        // Certificates
        $routes->group('certificate', function ($routes) {
            $routes->get('/', 'CertificateController::index', ['as' => 'certificates']);
            $routes->get('new', 'CertificateController::new', ['as' => 'certificate-new']);
            $routes->post('/', 'CertificateController::create', ['as' => 'certificate-create']);
            $routes->get('(:segment)/edit', 'CertificateController::edit/$1', ['as' => 'certificate-edit']);
            $routes->put('(:segment)', 'CertificateController::update/$1', ['as' => 'certificate-update']);
            $routes->delete('(:segment)', 'CertificateController::delete/$1', ['as' => 'certificate-delete']);
        });

        // Career Object
        $routes->group('career-object', function ($routes) {
            $routes->get('(:segment)/summary', 'CareerObjectController::show/$1', ['as' => 'career-objects']);
            $routes->get('/', 'CareerObjectController::new', ['as' => 'career-object-new']);
            $routes->post('/', 'CareerObjectController::create', ['as' => 'career-object-create']);
            $routes->get('(:segment)/edit', 'CareerObjectController::edit/$1', ['as' => 'career-object-edit']);
            $routes->put('(:segment)', 'CareerObjectController::update/$1', ['as' => 'career-object-update']);
            // $routes->delete('(:segment)', 'CareerObjectController::delete/$1', ['as' => 'career-object-delete']);
        });

        // PDF
        $routes->group('pdf', function ($routes) {
            $routes->get('/', 'PDFController::index', ['as' => 'pdf']);
            $routes->get('download', 'PDFController::downloadPdf', ['as' => 'pdf-download']);
            // $routes->delete('(:segment)', 'CareerObjectController::delete/$1', ['as' => 'career-object-delete']);
        });
    });

    $routes->get('/', function() {
        return view('pages/dashboard/index');
    }, ['as' => 'dashboard']);
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
