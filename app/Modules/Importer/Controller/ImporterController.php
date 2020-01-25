<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 10:12 AM
 */

namespace App\Modules\Importer\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Importer\Services\Contracts\ImporterServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 * Class ImporterController
 * @package App\Modules\Importer\Controller
 */
class ImporterController extends Controller
{
    /**
     * @var ImporterServiceInterface
     */
    protected $importerService;

    /**
     * ImporterController constructor.
     *
     * @param ImporterServiceInterface $importerService
     */
    public function __construct(ImporterServiceInterface $importerService)
    {
        $this->importerService = $importerService;
    }

    /**
     * Show list of places with pagination
     *
     * @return JsonResponse
     */
    public function list()
    {
        $list = $this->importerService->getList();

        $response = [
            'message' => $list['data'] ? 'Success.' : 'No record found.',
        ];

        $response = array_merge($response, $list);

        return Response::json($response, 200);
    }

    /**
     * Get details of a single place
     *
     * @param Request $request
     * @param $place
     * @return JsonResponse
     */
    public function details(Request $request, $place)
    {
        $request['id'] = $place;
        app('App\Modules\Importer\Requests\PlaceDetailsRequest');

        $details = $this->importerService->getDetails($request->get('id'));

        $response = [
            'message' => $details['data'] ? 'Success.' : 'Place not found.',
            'data' => $details['data']
        ];

        return Response::json($response, 200);
    }

    public function populate()
    {
        $this->importerService->populate();
    }
}
