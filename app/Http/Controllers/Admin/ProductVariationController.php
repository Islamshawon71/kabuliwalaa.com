<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductVariationRequest;
use App\Http\Requests\StoreProductVariationRequest;
use App\Http\Requests\UpdateProductVariationRequest;
use App\Models\Product;
use App\Models\ProductVariation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductVariationController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('product_variation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProductVariation::with(['product'])->select(sprintf('%s.*', (new ProductVariation())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'product_variation_show';
                $editGate = 'product_variation_edit';
                $deleteGate = 'product_variation_delete';
                $crudRoutePart = 'product-variations';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('product_variation_type', function ($row) {
                return $row->product_variation_type ? ProductVariation::PRODUCT_VARIATION_TYPE_SELECT[$row->product_variation_type] : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('content', function ($row) {
                return $row->content ? $row->content : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'product']);

            return $table->make(true);
        }

        return view('admin.productVariations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_variation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productVariations.create', compact('products'));
    }

    public function store(StoreProductVariationRequest $request)
    {
        $productVariation = ProductVariation::create($request->all());

        if ($request->input('image', false)) {
            $productVariation->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $productVariation->id]);
        }

        return redirect()->route('admin.product-variations.index');
    }

    public function edit(ProductVariation $productVariation)
    {
        abort_if(Gate::denies('product_variation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productVariation->load('product');

        return view('admin.productVariations.edit', compact('productVariation', 'products'));
    }

    public function update(UpdateProductVariationRequest $request, ProductVariation $productVariation)
    {
        $productVariation->update($request->all());

        if ($request->input('image', false)) {
            if (!$productVariation->image || $request->input('image') !== $productVariation->image->file_name) {
                if ($productVariation->image) {
                    $productVariation->image->delete();
                }
                $productVariation->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($productVariation->image) {
            $productVariation->image->delete();
        }

        return redirect()->route('admin.product-variations.index');
    }

    public function show(ProductVariation $productVariation)
    {
        abort_if(Gate::denies('product_variation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productVariation->load('product');

        return view('admin.productVariations.show', compact('productVariation'));
    }

    public function destroy(ProductVariation $productVariation)
    {
        abort_if(Gate::denies('product_variation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productVariation->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductVariationRequest $request)
    {
        ProductVariation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_variation_create') && Gate::denies('product_variation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ProductVariation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
