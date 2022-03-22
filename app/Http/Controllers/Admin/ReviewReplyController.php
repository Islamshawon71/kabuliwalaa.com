<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReviewReplyRequest;
use App\Http\Requests\StoreReviewReplyRequest;
use App\Http\Requests\UpdateReviewReplyRequest;
use App\Models\ProductReview;
use App\Models\ReviewReply;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReviewReplyController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('review_reply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReviewReply::with(['review'])->select(sprintf('%s.*', (new ReviewReply())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'review_reply_show';
                $editGate = 'review_reply_edit';
                $deleteGate = 'review_reply_delete';
                $crudRoutePart = 'review-replies';

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
            $table->addColumn('review_stars', function ($row) {
                return $row->review ? $row->review->stars : '';
            });

            $table->editColumn('reply', function ($row) {
                return $row->reply ? $row->reply : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? ReviewReply::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'review']);

            return $table->make(true);
        }

        return view('admin.reviewReplies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('review_reply_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviews = ProductReview::pluck('stars', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reviewReplies.create', compact('reviews'));
    }

    public function store(StoreReviewReplyRequest $request)
    {
        $reviewReply = ReviewReply::create($request->all());

        return redirect()->route('admin.review-replies.index');
    }

    public function edit(ReviewReply $reviewReply)
    {
        abort_if(Gate::denies('review_reply_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviews = ProductReview::pluck('stars', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reviewReply->load('review');

        return view('admin.reviewReplies.edit', compact('reviewReply', 'reviews'));
    }

    public function update(UpdateReviewReplyRequest $request, ReviewReply $reviewReply)
    {
        $reviewReply->update($request->all());

        return redirect()->route('admin.review-replies.index');
    }

    public function show(ReviewReply $reviewReply)
    {
        abort_if(Gate::denies('review_reply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviewReply->load('review');

        return view('admin.reviewReplies.show', compact('reviewReply'));
    }

    public function destroy(ReviewReply $reviewReply)
    {
        abort_if(Gate::denies('review_reply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviewReply->delete();

        return back();
    }

    public function massDestroy(MassDestroyReviewReplyRequest $request)
    {
        ReviewReply::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
