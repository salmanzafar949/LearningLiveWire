<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'comment'
    ];

    protected $guarded = ['id', 'user_id'];

    public function user()
    {
        return
            $this
                ->belongsTo(User::class);
    }

    public function support_ticket()
    {
        return
            $this
                ->belongsTo(SupportTicket::class);
    }
}
