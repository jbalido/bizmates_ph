<?php

namespace App\Modules\Importer\Commands;

use App\Modules\Importer\Services\Contracts\ImporterServiceInterface;
use Illuminate\Console\Command;

class PopulatePlace extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'place:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate places table from API Provider';

    /**
     * @var ImporterServiceInterface $importerService
     */
    protected $importerService;

    /**
     * Create a new command instance.
     *
     * @param ImporterServiceInterface $importerService
     */
    public function __construct(ImporterServiceInterface $importerService)
    {
        $this->importerService = $importerService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->importerService->populate();
    }
}
