<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Repositories\BookRepository;
use App\Validators\BookValidator;


class BooksController extends Controller
{

    /**
     * @var BookRepository
     */
    protected $repository;

    /**
     * @var BookValidator
     */
    protected $validator;

    private $user;

    /**
     * @param BookRepository $repository
     * @param BookValidator $validator
     */
    public function __construct(BookRepository $repository, BookValidator $validator)
    {
        $this->user = \Auth::user();
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        if ($this->user->is('admin')) $books = $this->repository;
        else $books = $this->user->books();

        $books = $books->paginate(10);
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $books,
            ]);
        }

        return view('books.index', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BookCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {
        if (!$this->user->is('admin')) return;
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $book = $this->repository->create($request->all());
            $response = [
                'message' => 'Book created.',
                'data'    => $book->toArray(),
            ];
            if ($request->wantsJson()) {
                return response()->json($response);
            }
            return redirect()->to('book')->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $book,
            ]);
        }

        return view('books.show', compact('book'));
    }


    /**
     * Display a create form
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!$this->user->is('admin')) return redirect()->to('book');
        return view('books.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$this->user->is('admin')) return redirect()->to('book');
        $book = $this->repository->find($id);
        return view('books.edit', compact('book'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BookUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        if (!$this->user->is('admin')) return;
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $book = $this->repository->update($request->all(), $id);
            $response = [
                'message' => 'Book updated.',
                'data'    => $book->toArray(),
            ];
            if ($request->wantsJson()) {
                return response()->json($response);
            }
            return redirect()->to('/book')->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->user->is('admin')) return;
        $deleted = $this->repository->delete($id);
        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Book deleted.',
                'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with('message', 'Book deleted.');
    }
}
