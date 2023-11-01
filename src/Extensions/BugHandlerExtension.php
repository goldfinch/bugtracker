<?php

namespace Goldfinch\BugTracker\Extensions;

use Goldfinch\BugTracker\Models\Bug;
use SilverStripe\Core\Extension;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Security\SecurityToken;

class BugHandlerExtension extends Extension
{
    public function onBeforeHTTPError($statusCode, HTTPRequest $request, $errorMessage = null)
    {
        if (Environment::getEnv('SS_BUG_TRACKER'))
        {
            $data = [
              'url' => $request->getUrl(),
              'referer' => $request->getHeader('referer'),
              'extension' => $request->getExtension(),
              'sec-fetch-dest' => $request->getHeader('sec-fetch-dest'),
              'accept' => $request->getHeader('accept'),
              'host' => $request->getHeader('host'),
              'scheme' => $request->getScheme(),
              'method' => $request->httpMethod(),
              'ip' => $request->getIp(),
              'route' => $request->routeParams(),
              'security-id' => SecurityToken::getSecurityID(),
            ];

            $bug = new Bug;
            $bug->Data = json_encode($data);
            $bug->write();
        }
    }
}
