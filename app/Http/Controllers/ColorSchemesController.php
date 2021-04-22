<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use Illuminate\Http\Request;
use App\Models\ColorSchema;
use App\Services\ColorSchemeManager;
use Illuminate\Validation\DatabasePresenceVerifier;

/**
 * Class ColorSchemesController
 * @package App\Http\Controllers
 */
class ColorSchemesController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        return $this->createResponse(ColorSchema::all()->toArray());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        return $this->createResponse(ColorSchema::findOrFail($request->route('id'))->toArray());
    }

    /**
     * @param Request $request
     * @param ColorSchemeManager $manager
     * @param DatabasePresenceVerifier $verifier
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(Request $request, ColorSchemeManager $manager, DatabasePresenceVerifier $verifier)
    {
        $colorSchema = $manager->create($request, $verifier);

        return $this->createResponse($colorSchema->toArray(), 201);
    }

    /**
     * @param Request $request
     * @param ColorSchemeManager $manager
     * @param DatabasePresenceVerifier $verifier
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Request $request, ColorSchemeManager $manager, DatabasePresenceVerifier $verifier)
    {
        /** @var ColorSchema $colorSchema */
        $colorSchema = ColorSchema::findOrFail($request->route('id'));
        if ($colorSchema->is_default) {
            throw new CustomException(new \App\Errors\CannotEditDefaultScheme());
        }
        $manager->update($request, $verifier, $colorSchema);

        return $this->createResponse($colorSchema->toArray());
    }

    /**
     * @param Request $request
     * @param ColorSchemeManager $manager
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function setActive(Request $request, ColorSchemeManager $manager)
    {
        $colorSchema = ColorSchema::findOrFail($request->route('id'));
        $manager->setAsActive($colorSchema);

        return $this->createResponse(null, 202);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getActive()
    {
        return $this->createResponse(ColorSchema::getActive()->toArray());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Request $request)
    {
        /** @var ColorSchema $colorSchema */
        $colorSchema = ColorSchema::findOrFail($request->route('id'));
        if ($colorSchema->is_default) {
            throw new CustomException(new \App\Errors\CannotRemoveDefaultScheme());
        }
        if ($colorSchema->is_active) {
            throw new CustomException(new \App\Errors\CannotRemoveActiveScheme());
        }
        $colorSchema->delete();

        return $this->createResponse([], 204);
    }
}
