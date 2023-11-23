<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use App\Models\BasicInformationModel;
use App\Models\BookModel;
use App\Models\CareerObjectModel;
use App\Models\CertificateModel;
use App\Models\EducationModel;
use App\Models\GenreModel;
use App\Models\PublisherModel;
use App\Models\SaleItemModel;
use App\Models\SaleModel;
use App\Models\ShippingModel;
use App\Models\WorkModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Models\UserModel;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->user = new UserModel();
        $this->authGroup = new GroupModel();
        $this->genre = new GenreModel();
        $this->author = new AuthorModel();
        $this->publisher = new PublisherModel();
        $this->book = new BookModel();
        $this->shipping = new ShippingModel();
        $this->sale = new SaleModel();
        $this->saleItem = new SaleItemModel();
        $this->basicInfo = new BasicInformationModel();
        $this->education = new EducationModel();
        $this->work = new WorkModel();
        $this->certificate = new CertificateModel();
        $this->careerObject = new CareerObjectModel();
    }
}
