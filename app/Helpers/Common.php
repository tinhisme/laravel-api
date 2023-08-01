<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Exceptions\AuthenticateException;


class Common
{
    const TIME_FORMAT = 'Y-m-d H:i:s';

    /**
     * bcSum
     *
     * @param array $arrayNumber;
     */
    public static function bcSum($arrayNumber){
        $total = '0';
        foreach ($arrayNumber as $val) {
            $total = bcadd($total, $val, config('common.precision'));
        }
        return $total;
    }

        /**
     * @param \Illuminate\Database\Eloquent\Model $latestRecord
     * @return array
     */
    public static function getNameDateLatestRecord($latestRecord)
    {
        $updatedAtLatest = null;
        $userUpdated = null;
        if ($latestRecord != null && $latestRecord->getAttributeValue('updated_at') != null && $latestRecord->getAttributeValue('updated_by') != null) {
            $updatedAtLatest = $latestRecord->getAttributeValue('updated_at')->format('Y/m/d H:i:s');
            $userUpdated = User::setEagerLoads([])->find($latestRecord->getAttributeValue('updated_by'))->getAttribute('name');
        }
        return [
            'user_updated' => $userUpdated,
            'updated_at_latest' => $updatedAtLatest,
        ];
    }
}
