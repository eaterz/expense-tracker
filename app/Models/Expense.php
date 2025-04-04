<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /** @use HasFactory<\Database\Factories\ExpenseFactory> */
    use HasFactory;

    protected $fillable = ['spent_at','amount','category_id','notes','goal_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
