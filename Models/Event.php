<?php 

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\User\Traits\Uuids;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Uuids;

    protected $table = 'event';

    public $fillable = ['id', 'action', 'treatment_id', 'consent_id', 'subject_id', 'payload'];

    public function consent()
    {
        return $this->belongsTo(Consent::class);
    }

    public function setPayloadAttribute($value)
    {
        $this->attributes['payload'] = Crypt::encrypt(json_encode($value));
    }

    public function setIpAttribute($value)
    {
        $this->attributes['ip'] = Crypt::encrypt($value);
    }
}
