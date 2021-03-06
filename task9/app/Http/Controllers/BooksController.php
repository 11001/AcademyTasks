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


    /**
     * @param BookRepository $repository
     * @param BookValidator $validator
     */
    public function __construct(BookRepository $repository, BookValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $books = $this->repository->all();
        return response()->json($books);
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
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $book = $this->repository->create($request->all());
            $response = [
                'message' => 'Book created.',
                'data' => $book->toArray(),
            ];
            return response()->json($response);

        } catch (ValidatorException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessageBag()
            ]);
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
        return response()->json([
            'data' => $book,
        ]);

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

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BookUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
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
        $this->repository->delete($id);
    }
}
