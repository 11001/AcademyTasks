<?

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Http\Requests;
use App\Repositories\BookRepository;

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
     * Store a newly created relantionship
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function attachBook($user_id, $book_id)
    {
        $book = $this->bookRepository->find($book_id);
        if (!$book->users->contains($user_id)) {
            $book->users()->attach($user_id);
        }
        $book->save();
        return response()->json([
            'response' => 'Book' . $book_id . ' added to user ' . $user_id
        ]);
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
        return response()->json([
            'response' => 'Book' . $book_id . ' detached from user ' . $user_id
        ]);
    }
}