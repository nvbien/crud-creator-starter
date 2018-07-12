<?php
if (! function_exists('convert_UTC_to_local_time')) {
    function convert_UTC_to_local_time($timeUTC)
    {
        $offset = session('offset');
        $timezoneName = tzOffsetToName(intval($offset));
        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timeUTC, 'UTC');
        if($timezoneName){
            $date->setTimezone($timezoneName);
        }
        return $date;
    }
}
if (! function_exists('get_local_timezone')) {
    function get_local_timezone()
    {
        $offset = session('offset');
        return tzOffsetToName(intval($offset));
    }
}
if (! function_exists('format_date_local_time')) {
    function format_date_local_time($date, $sep = ' ')
    {
        $offset = session('offset');
        $tz= tzOffsetToName(intval($offset));
        $format = config('app.date_format'). $sep. config('app.time_format');
        return $date->tz($tz)->format($format);
    }
}
function tzOffsetToName($offset, $isDst = null)
{
    if ($isDst === null)
    {
        $isDst = date('I');
    }

    $offset *= 3600;
    $zone    = timezone_name_from_abbr('', $offset, $isDst);

    if ($zone === false)
    {
        foreach (timezone_abbreviations_list() as $abbr)
        {
            foreach ($abbr as $city)
            {
                if ((bool)$city['dst'] === (bool)$isDst &&
                    strlen($city['timezone_id']) > 0    &&
                    $city['offset'] == $offset)
                {
                    $zone = $city['timezone_id'];
                    break;
                }
            }

            if ($zone !== false)
            {
                break;
            }
        }
    }

    return $zone;
}