<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Banking\Transaction;

class LatestExpenses extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'width' => 'col-md-4'
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $latest_expenses = Transaction::type('expense')->orderBy('paid_at', 'desc')->isNotTransfer()->take(5)->get();

        return view('widgets.latest_expenses', [
            'config' => (object) $this->config,
            'latest_expenses' => $latest_expenses,
        ]);
    }
}