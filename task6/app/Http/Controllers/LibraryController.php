<?

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Repositories\BookRepository;
use App\Validators\BookValidator;


class LibraryController extends Controller
{
    /**
     * @var BookRepository
     */
    protected $bookRepository;
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(BookRepository $bookRepository, UserRepository $userRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function attachUserToBook($id)
    {
        $book = $this->bookRepository->find($id);
        $users = $this->userRepository->all();
        if (request()->wantsJson()) {
            return response()->json([
                'data' => $book,
            ]);
        }
        return view('library.form_set_user', compact('book', 'users'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function attachBookToUser($id)
    {
        $books = $this->bookRepository->all();
        $user = $this->userRepository->find($id);
        return view('library.form_set_book', compact('books', 'user'));
    }

    /**
     * Store a newly created relantionship
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function attachBook($book_id, $user_id)
    {
        $book = $this->bookRepository->find($book_id);
        if (!$book->users->contains($user_id)) {
            $book->users()->attach($user_id);
        }
        $book->save();
        return redirect()->back()->with('message', 'User added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function detachBook($book_id, $user_id)
    {
        $book = $this->bookRepository->find($book_id);
        $book->users()->detach($user_id);
        $book->save();

        return redirect()->back()->with('message', 'Book deleted.');
    }
}