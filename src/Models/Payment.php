<?php

namespace Cws\Payments\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'reference',
        'amount',
        'transaction_id',
        'transaction_timestamp',
        'options',
        'response',
        'is_paid',
    ];

    /**
     * @return string[]
     */
    protected function casts(): array
    {
        return [
            'transaction_timestamp' => 'datetime',
            'options'               => 'array',
            'response'              => 'array',
            'is_paid'               => 'bool',
        ];
    }

    /**
     * @return string
     */
    public function getRouteKey(): string
    {
        $key = sha1($this->getKey().env('APP_KEY').__CLASS__);
        $key = base64_encode($key);
        $key = preg_replace('#[^A-Z0-9]#i', '', $key);
        $key = $key.'-'.$this->getKey();

        return $key;
    }

    /**
     * @param mixed $value
     * @param null $field
     * @return Payment|Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        if (preg_match('#^[A-Z0-9]+-(\d+)$#i', $value, $matches)) {
            $resolved = $this->newQuery()
                ->where($this->getKeyName(), '=', $matches[1])
                ->first();

            if ($resolved instanceof Payment && $resolved->getRouteKey() === $value) {
                return $resolved;
            }
        }

        return null;
    }
}