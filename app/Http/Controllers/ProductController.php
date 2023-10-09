<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreFromFileRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductsParseFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * @return Response
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Products/Index', ['products' => ProductResource::collection(Product::get())]);
    }

    /**
     * @param StoreFromFileRequest $request
     * @return RedirectResponse
     */
    public function storeFromCsv(StoreFromFileRequest $request): \Illuminate\Http\RedirectResponse
    {

        try {
            (new ProductsParseFile)($request->file);
        } catch (\Exception $exception) {
            Log::error('error: ' . $exception->getMessage());
            return to_route('home')->with(['message' => $exception->getMessage()]);
        }

        return to_route('home')->with(['message' => 'Файл успешно обработан']);
    }
}
