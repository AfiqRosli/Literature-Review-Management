<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\LiteratureReview;
use App\Quote;

class BackupController extends Controller
{
    public function backup() {
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

        Session::flash('backup_success', 'Database successfully updated');

        return back();
    }

    public function restore() {
        LiteratureReview::truncate();
        Quote::truncate();

        $literatureReviews = LiteratureReview::on('mysql2')->get();
        $quotes = Quote::on('mysql2')->get();

        $literatureReviews->each(function($literatureReview) {
            unset($literatureReview['created_at']);
            unset($literatureReview['updated_at']);
            unset($literatureReview['deleted_at']);
            LiteratureReview::create($literatureReview->toArray());
        });

        $quotes->each(function($quote) {
            unset($quote['created_at']);
            unset($quote['updated_at']);
            unset($quote['deleted_at']);
            Quote::create($quote->toArray());
        });

        Session::flash('restore_success', 'Database restored successfully updated');

        return back();
    }
}
