<?php
// app/Helpers/helpers.php
if (!function_exists('str_limit_words')) {
    function str_limit_words($string, $words = 100, $end = '...')
    {
        $wordArr = explode(' ', $string);
        if (count($wordArr) <= $words) {
            return $string;
        }
        return implode(' ', array_slice($wordArr, 0, $words)) . $end;
    }
}

if (!function_exists('formatDate')) {
    /**
     * Format a given date to 'd F Y' format.
     *
     * @param  string|\DateTime $date
     * @return string
     */
    function formatDate($date)
    {
        return \Carbon\Carbon::parse($date)->format('d F Y');
    }
}


if (!function_exists('hasPermission')) {
    function hasPermission($routeName)
    {
        if (!Auth::check()) return false;

        static $allowedRoutes;

        if (is_null($allowedRoutes)) {
            $user = Auth::user();
            $permission_ids = DB::table('role_permissions')
                ->where('role_id', $user->role_id)
                ->pluck('permission_id');

            $allowedRoutes = DB::table('permissions')
                ->whereIn('id', $permission_ids)
                ->pluck('route')
                ->toArray();
        }

        return in_array($routeName, $allowedRoutes);
    }
}

