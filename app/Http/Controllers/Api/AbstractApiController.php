<?php

/*
 * This file is part of Cachet.
 *
 * (c) James Brooks <james@cachethq.io>
 * (c) Joseph Cohen <joseph.cohen@dinkbit.com>
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Http\Controllers\Api;

use CachetHQ\Cachet\Http\Controllers\AbstractController as BaseController;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

abstract class AbstractApiController extends BaseController
{
    /**
     * The HTTP response headers.
     *
     * @var array
     */
    protected $headers = [];

    /**
     * The HTTP response meta data.
     *
     * @var array
     */
    protected $meta = [];

    /**
     * The HTTP response data.
     *
     * @var array
     */
    protected $data = [];

    /**
     * The HTTP response status code.
     *
     * @var int
     */
    protected $statusCode = 200;

    /**
     * Set the response headers.
     *
     * @param array $headers
     *
     * @return $this
     */
    protected function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Set the response meta data.
     *
     * @param array $meta
     *
     * @return $this
     */
    protected function setMetaData(array $meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * Set the response meta data.
     *
     * @param array $data
     *
     * @return $this
     */
    protected function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Set the response status code.
     *
     * @param int $statusCode
     *
     * @return $this
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Respond with a pagination response.
     *
     * @param \Illuminate\Pagination\Paginator $paginator
     * @param \Illuminate\Http\Request         $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function paginator(Paginator $paginator, Request $request)
    {
        foreach ($request->query as $key => $value) {
            if ($key != 'page') {
                $paginator->addQuery($key, $value);
            }
        }

        $pagination = [
            'pagination' => [
                'total'         => $paginator->total(),
                'count'         => count($paginator->items()),
                'per_page'      => $paginator->perPage(),
                'current_page'  => $paginator->currentPage(),
                'total_pages'   => $paginator->lastPage(),
                'links'         => [
                    'next_page'     => $paginator->nextPageUrl(),
                    'previous_page' => $paginator->previousPageUrl(),
                ],
            ],
        ];

        return $this->setMetaData($pagination)->setData($paginator->items())->respond();
    }

    /**
     * Respond with a no content response.
     *
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function noContent()
    {
        return $this->setStatusCode(204)->respond();
    }

    /**
     * Build the response.
     *
     * @return \Illuminate\Http\Response
     */
    protected function respond()
    {
        if (!empty($this->meta)) {
            $response['meta'] = $this->meta;
        }

        $response['data'] = $this->data;

        if ($this->data instanceof Arrayable) {
            $response['data'] = $this->data->toArray();
        }

        return Response::json($response, $this->statusCode, $this->headers);
    }
}
