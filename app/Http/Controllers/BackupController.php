<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LiteratureReview;
use App\Quote;

class BackupController extends Controller
{
    public function backup() {
        // LiteratureReview::on('mysql2')->truncate();
        // Quote::on('mysql2')->truncate();

        $literatureReviews = LiteratureReview::all();
        $quotes = Quote::all();

        $literatureReviews->each(function($literatureReview) {
            unset($literatureReview['created_at']);
            unset($literatureReview['updated_at']);
            unset($literatureReview['deleted_at']);
            LiteratureReview::on('mysql2')->updateOrCreate($literatureReview->toArray());
        });

        $quotes->each(function($quote) {
            unset($quote['created_at']);
            unset($quote['updated_at']);
            unset($quote['deleted_at']);
            Quote::on('mysql2')->updateOrCreate($quote->toArray());
        });

        return 'backup done';
    }
}
