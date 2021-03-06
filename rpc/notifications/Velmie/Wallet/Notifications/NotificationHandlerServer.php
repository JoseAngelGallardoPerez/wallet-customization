<?php
# Generated by the protocol buffer compiler (protoc-gen-twirp_php ).  DO NOT EDIT!
# source: notifications.proto

declare(strict_types=1);

namespace Velmie\Wallet\Notifications;

use Google\Protobuf\Internal\GPBDecodeException;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Twirp\BaseServerHooks;
use Twirp\Context;
use Twirp\ErrorCode;
use Twirp\ServerHooks;

/**
 * @see NotificationHandler
 *
 * Generated from protobuf service <code>velmie.wallet.notifications.NotificationHandler</code>
 */
final class NotificationHandlerServer implements RequestHandlerInterface
{
    const PATH_PREFIX = '/twirp/velmie.wallet.notifications.NotificationHandler/';

    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    /**
     * @var NotificationHandler
     */
    private $svc;

    /**
     * @var ServerHooks
     */
    private $hook;

    public function __construct(
        NotificationHandler $svc,
        ServerHooks $hook = null,
        ResponseFactoryInterface $responseFactory = null,
        StreamFactoryInterface $streamFactory = null
    ) {
        if ($hook === null) {
            $hook = new BaseServerHooks();
        }

        if ($responseFactory === null) {
            $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        }

        if ($streamFactory === null) {
            $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        }

        $this->svc = $svc;
        $this->hook = $hook;
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
    }

    /**
     * Handle the request and return a response.
     */
    public function handle(ServerRequestInterface $req): ResponseInterface
    {
        $ctx = $req->getAttributes();
        $ctx = Context::withPackageName($ctx, 'velmie.wallet.notifications');
        $ctx = Context::withServiceName($ctx, 'NotificationHandler');

        try {
            $ctx = $this->hook->requestReceived($ctx);
        } catch (\Throwable $e) {
            return $this->writeError($ctx, $e);
        }

        if ($req->getMethod() !== 'POST') {
            $msg = sprintf('unsupported method "%s" (only POST is allowed)', $req->getMethod());

            return $this->writeError($ctx, $this->badRouteError($msg, $req->getMethod(), $req->getUri()->getPath()));
        }

        switch ($req->getUri()->getPath()) {
            case '/twirp/velmie.wallet.notifications.NotificationHandler/Dispatch':
                return $this->handleDispatch($ctx, $req);
            case '/twirp/velmie.wallet.notifications.NotificationHandler/GetSettings':
                return $this->handleGetSettings($ctx, $req);
            case '/twirp/velmie.wallet.notifications.NotificationHandler/GetUserSettings':
                return $this->handleGetUserSettings($ctx, $req);

            default:
                return $this->writeError($ctx, $this->noRouteError($req));
        }
    }

    private function handleDispatch(array $ctx, ServerRequestInterface $req): ResponseInterface
    {
        $header = $req->getHeaderLine('Content-Type');
        $i = strpos($header, ';');

        if ($i === false) {
            $i = strlen($header);
        }

        $respHeaders = [];
        $ctx[Context::RESPONSE_HEADER] = &$respHeaders;

        switch (trim(strtolower(substr($header, 0, $i)))) {
            case 'application/json':
                $resp = $this->handleDispatchJson($ctx, $req);
                break;

            case 'application/protobuf':
                $resp = $this->handleDispatchProtobuf($ctx, $req);
                break;

            default:
                $msg = sprintf('unexpected Content-Type: "%s"', $req->getHeaderLine('Content-Type'));

                return $this->writeError($ctx, $this->badRouteError($msg, $req->getMethod(), $req->getUri()->getPath()));
        }

        foreach ($respHeaders as $key => $value) {
            $resp = $resp->withHeader($key, $value);
        }

        return $resp;
    }

    private function handleDispatchJson(array $ctx, ServerRequestInterface $req): ResponseInterface
    {
        $ctx = Context::withMethodName($ctx, 'Dispatch');

        try {
            $ctx = $this->hook->requestRouted($ctx);

            $in = new \Velmie\Wallet\Notifications\Request();
            $in->mergeFromJsonString((string)$req->getBody());

            $out = $this->svc->Dispatch($ctx, $in);

            if ($out === null) {
                return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'received a null response while calling Dispatch. null responses are not supported'));
            }

            $ctx = $this->hook->responsePrepared($ctx);
        } catch (GPBDecodeException $e) {
            return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'failed to parse request json'));
        } catch (\Throwable $e) {
            return $this->writeError($ctx, $e);
        }

        $data = $out->serializeToJsonString();

        $body = $this->streamFactory->createStream($data);

        $resp = $this->responseFactory
            ->createResponse(200)
            ->withHeader('Content-Type', 'application/json')
            ->withBody($body);

        $this->callResponseSent($ctx);

        return $resp;
    }

    private function handleDispatchProtobuf(array $ctx, ServerRequestInterface $req): ResponseInterface
    {
        $ctx = Context::withMethodName($ctx, 'Dispatch');

        try {
            $ctx = $this->hook->requestRouted($ctx);

            $in = new \Velmie\Wallet\Notifications\Request();
            $in->mergeFromString((string)$req->getBody());

            $out = $this->svc->Dispatch($ctx, $in);

            if ($out === null) {
                return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'received a null response while calling Dispatch. null responses are not supported'));
            }

            $ctx = $this->hook->responsePrepared($ctx);
        } catch (GPBDecodeException $e) {
            return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'failed to parse request proto'));
        } catch (\Throwable $e) {
            return $this->writeError($ctx, $e);
        }

        $data = $out->serializeToString();

        $body = $this->streamFactory->createStream($data);

        $resp = $this->responseFactory
            ->createResponse(200)
            ->withHeader('Content-Type', 'application/protobuf')
            ->withBody($body);

        $this->callResponseSent($ctx);

        return $resp;
    }
    private function handleGetSettings(array $ctx, ServerRequestInterface $req): ResponseInterface
    {
        $header = $req->getHeaderLine('Content-Type');
        $i = strpos($header, ';');

        if ($i === false) {
            $i = strlen($header);
        }

        $respHeaders = [];
        $ctx[Context::RESPONSE_HEADER] = &$respHeaders;

        switch (trim(strtolower(substr($header, 0, $i)))) {
            case 'application/json':
                $resp = $this->handleGetSettingsJson($ctx, $req);
                break;

            case 'application/protobuf':
                $resp = $this->handleGetSettingsProtobuf($ctx, $req);
                break;

            default:
                $msg = sprintf('unexpected Content-Type: "%s"', $req->getHeaderLine('Content-Type'));

                return $this->writeError($ctx, $this->badRouteError($msg, $req->getMethod(), $req->getUri()->getPath()));
        }

        foreach ($respHeaders as $key => $value) {
            $resp = $resp->withHeader($key, $value);
        }

        return $resp;
    }

    private function handleGetSettingsJson(array $ctx, ServerRequestInterface $req): ResponseInterface
    {
        $ctx = Context::withMethodName($ctx, 'GetSettings');

        try {
            $ctx = $this->hook->requestRouted($ctx);

            $in = new \Velmie\Wallet\Notifications\SettingsRequest();
            $in->mergeFromJsonString((string)$req->getBody());

            $out = $this->svc->GetSettings($ctx, $in);

            if ($out === null) {
                return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'received a null response while calling GetSettings. null responses are not supported'));
            }

            $ctx = $this->hook->responsePrepared($ctx);
        } catch (GPBDecodeException $e) {
            return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'failed to parse request json'));
        } catch (\Throwable $e) {
            return $this->writeError($ctx, $e);
        }

        $data = $out->serializeToJsonString();

        $body = $this->streamFactory->createStream($data);

        $resp = $this->responseFactory
            ->createResponse(200)
            ->withHeader('Content-Type', 'application/json')
            ->withBody($body);

        $this->callResponseSent($ctx);

        return $resp;
    }

    private function handleGetSettingsProtobuf(array $ctx, ServerRequestInterface $req): ResponseInterface
    {
        $ctx = Context::withMethodName($ctx, 'GetSettings');

        try {
            $ctx = $this->hook->requestRouted($ctx);

            $in = new \Velmie\Wallet\Notifications\SettingsRequest();
            $in->mergeFromString((string)$req->getBody());

            $out = $this->svc->GetSettings($ctx, $in);

            if ($out === null) {
                return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'received a null response while calling GetSettings. null responses are not supported'));
            }

            $ctx = $this->hook->responsePrepared($ctx);
        } catch (GPBDecodeException $e) {
            return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'failed to parse request proto'));
        } catch (\Throwable $e) {
            return $this->writeError($ctx, $e);
        }

        $data = $out->serializeToString();

        $body = $this->streamFactory->createStream($data);

        $resp = $this->responseFactory
            ->createResponse(200)
            ->withHeader('Content-Type', 'application/protobuf')
            ->withBody($body);

        $this->callResponseSent($ctx);

        return $resp;
    }
    private function handleGetUserSettings(array $ctx, ServerRequestInterface $req): ResponseInterface
    {
        $header = $req->getHeaderLine('Content-Type');
        $i = strpos($header, ';');

        if ($i === false) {
            $i = strlen($header);
        }

        $respHeaders = [];
        $ctx[Context::RESPONSE_HEADER] = &$respHeaders;

        switch (trim(strtolower(substr($header, 0, $i)))) {
            case 'application/json':
                $resp = $this->handleGetUserSettingsJson($ctx, $req);
                break;

            case 'application/protobuf':
                $resp = $this->handleGetUserSettingsProtobuf($ctx, $req);
                break;

            default:
                $msg = sprintf('unexpected Content-Type: "%s"', $req->getHeaderLine('Content-Type'));

                return $this->writeError($ctx, $this->badRouteError($msg, $req->getMethod(), $req->getUri()->getPath()));
        }

        foreach ($respHeaders as $key => $value) {
            $resp = $resp->withHeader($key, $value);
        }

        return $resp;
    }

    private function handleGetUserSettingsJson(array $ctx, ServerRequestInterface $req): ResponseInterface
    {
        $ctx = Context::withMethodName($ctx, 'GetUserSettings');

        try {
            $ctx = $this->hook->requestRouted($ctx);

            $in = new \Velmie\Wallet\Notifications\UserSettingsRequest();
            $in->mergeFromJsonString((string)$req->getBody());

            $out = $this->svc->GetUserSettings($ctx, $in);

            if ($out === null) {
                return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'received a null response while calling GetUserSettings. null responses are not supported'));
            }

            $ctx = $this->hook->responsePrepared($ctx);
        } catch (GPBDecodeException $e) {
            return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'failed to parse request json'));
        } catch (\Throwable $e) {
            return $this->writeError($ctx, $e);
        }

        $data = $out->serializeToJsonString();

        $body = $this->streamFactory->createStream($data);

        $resp = $this->responseFactory
            ->createResponse(200)
            ->withHeader('Content-Type', 'application/json')
            ->withBody($body);

        $this->callResponseSent($ctx);

        return $resp;
    }

    private function handleGetUserSettingsProtobuf(array $ctx, ServerRequestInterface $req): ResponseInterface
    {
        $ctx = Context::withMethodName($ctx, 'GetUserSettings');

        try {
            $ctx = $this->hook->requestRouted($ctx);

            $in = new \Velmie\Wallet\Notifications\UserSettingsRequest();
            $in->mergeFromString((string)$req->getBody());

            $out = $this->svc->GetUserSettings($ctx, $in);

            if ($out === null) {
                return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'received a null response while calling GetUserSettings. null responses are not supported'));
            }

            $ctx = $this->hook->responsePrepared($ctx);
        } catch (GPBDecodeException $e) {
            return $this->writeError($ctx, TwirpError::newError(ErrorCode::Internal, 'failed to parse request proto'));
        } catch (\Throwable $e) {
            return $this->writeError($ctx, $e);
        }

        $data = $out->serializeToString();

        $body = $this->streamFactory->createStream($data);

        $resp = $this->responseFactory
            ->createResponse(200)
            ->withHeader('Content-Type', 'application/protobuf')
            ->withBody($body);

        $this->callResponseSent($ctx);

        return $resp;
    }

    /**
     * Used when there is no route for a request.
     */
    private function noRouteError(ServerRequestInterface $req): TwirpError
    {
        $msg = sprintf('no handler for path "%s"', $req->getUri()->getPath());

        return $this->badRouteError($msg, $req->getMethod(), $req->getUri()->getPath());
    }

    /**
     * Used when the twirp server cannot route a request.
     */
    private function badRouteError(string $msg, string $method, string $url): TwirpError
    {
        $e = TwirpError::newError(ErrorCode::BadRoute, $msg);
        $e->setMeta('twirp_invalid_route', $method . ' ' . $url);

        return $e;
    }

    /**
     * Writes errors in the response and triggers hooks.
     */
    private function writeError(array $ctx, \Throwable $e): ResponseInterface
    {
        // Non-twirp errors are mapped to be internal errors
        if ($e instanceof \Twirp\Error) {
            $statusCode = $e->getErrorCode();
        } else {
            $statusCode = ErrorCode::Internal;
        }

        $statusCode = ErrorCode::serverHTTPStatusFromErrorCode($statusCode);
        $ctx = Context::withStatusCode($ctx, $statusCode);

        try {
            $ctx = $this->hook->error($ctx, $e);
        } catch (\Throwable $e) {
            // We have three options here. We could log the error, call the Error
            // hook, or just silently ignore the error.
            //
            // Logging is unacceptable because we don't have a user-controlled
            // logger; writing out to stderr without permission is too rude.
            //
            // Calling the Error hook would confuse users: it would mean the Error
            // hook got called twice for one request, which is likely to lead to
            // duplicated log messages and metrics, no matter how well we document
            // the behavior.
            //
            // Silently ignoring the error is our least-bad option. It's highly
            // likely that the connection is broken and the original 'err' says
            // so anyway.
        }

        $this->callResponseSent($ctx);

        if (!$e instanceof \Twirp\Error) {
            $e = TwirpError::errorFrom($e, 'internal error');
        }

        $body = $this->streamFactory->createStream(json_encode([
            'code' => $e->getErrorCode(),
            'msg' => $e->getMessage(),
            'meta' => $e->getMetaMap(),
        ]));

        return $this->responseFactory
            ->createResponse($statusCode)
            ->withHeader('Content-Type', 'application/json') // Error responses are always JSON (instead of protobuf)
            ->withBody($body);
    }

    /**
     * Triggers response sent hook.
     */
    private function callResponseSent(array $ctx): void
    {
        try {
            $this->hook->responseSent($ctx);
        } catch (\Throwable $e) {
            // We have three options here. We could log the error, call the Error
            // hook, or just silently ignore the error.
            //
            // Logging is unacceptable because we don't have a user-controlled
            // logger; writing out to stderr without permission is too rude.
            //
            // Calling the Error hook could confuse users: this hook is triggered
            // by the error hook itself, which is likely to lead to
            // duplicated log messages and metrics, no matter how well we document
            // the behavior.
            //
            // Silently ignoring the error is our least-bad option. It's highly
            // likely that the connection is broken and the original 'err' says
            // so anyway.
        }
    }
}
