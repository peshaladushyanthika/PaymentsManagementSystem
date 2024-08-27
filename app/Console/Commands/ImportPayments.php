<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;

class ImportPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:payments {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import payments data from a CSV file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = $this->argument('file');
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0);

        $rows = $csv->getRecords();

        $imported = 0;
        $skipped = 0;
        
        foreach ($rows as $row) {

            // Map the CSV columns to database fields
            $data = [
                'user_id' => $row['user_id'],
                'user_name' => $row['user_name'],
                'user_email' => $row['user_email'],
                'order_id' => $row['order_id'],  // Map the actual order ID field
                'total_amount' => $row['order_total_amount'],
                'payment_id' => $row['payment_id'],
                'payment_amount' => $row['payment_amount'],
                'payment_method' => $row['payment_method'],
                'payment_date' => $row['payment_date'],
            ];

            $validator = Validator::make($data, [
                'user_id' => 'required|exists:users,id',
                'user_name' => 'required|string',
                'user_email' => 'required|email',
                'order_id' => 'required|exists:orders,id',
                'total_amount' => 'required|numeric:orders,total_amount',
                'payment_id' => 'required|numeric',
                'payment_amount' => 'required|numeric',
                'payment_method' => 'required|in:credit_card,paypal,bank_transfer,cash',
                'payment_date' => 'required|date',
            ]);
            if ($validator->fails()) {
                $skipped++;
                $this->info('Skipped row: ' . json_encode($row));
                $this->info('Validation errors: ' . json_encode($validator->errors()));
                continue;
            }

            Payment::create([
                'id' => $row['payment_id'],
                'order_id' => $row['order_id'],
                'amount' => $row['payment_amount'],
                'payment_method' => $row['payment_method'],
                'payment_date' => $row['payment_date'],
            ]);

            $imported++;
        }
        $this->info("Imported: $imported, Skipped: $skipped");
    }
}
