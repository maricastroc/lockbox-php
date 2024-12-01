<?php
function renderMessage($message)
{
  if (strlen($message) > 0) {
    return "
            <div class='w-auto items-center text-center'>
                <h2 class='mb-10 text-md text-indigo-500 font-mono'>{$message}</h2>
            </div>
        ";
  }
  return '';
}

function renderMovieImage($movie)
{
  $coverUrl = $movie->cover_url ?: 'data/images/poster-not-found.jpg';

  return "
        <img
            src='{$coverUrl}'
            alt='{$movie->title}'
            class='rounded w-40 h-auto md:h-[16rem] opacity-80 z-0'
        >
    ";
}

function renderUserAvatar($user)
{
    $defaultAvatar = 'data/users/images/octocat.png';
    $avatarUrl = ($user && isset($user->avatar_url)) ? $user->avatar_url : $defaultAvatar;
    $altText = $user ? $user->name : 'userImage';
    $avatarClass = 'rounded-full w-[4rem] h-[4rem]';

    return "
        <div class='flex items-center justify-center p-1 border rounded-full border-indigo-300'>
            <img src='{$avatarUrl}' alt='{$altText}' class='{$avatarClass}'>
        </div>
    ";
}

function renderRatingStars($averageRating, $quantity)
{
  $stars = str_repeat('<i class="ph ph-star text-md m-0 p-0"></i>', $averageRating);
  return "
        <p class='text-neutral-100 font-mono text-xs'>
            {$stars} ({$quantity} ratings)
        </p>
    ";
}

function renderReview($rating)
{
  return "
        <div class='w-full p-2 rounded-md bg-zinc-800 p-4 text-neutral-300'>
            <div class='flex flex-col'>
                <section class='leading-5 text-xs font-mono max-[400px]:mt-6'>
                    \"" . htmlspecialchars($rating->review) . "\"
                </section>
                <div class='text-xs mt-4'>" . str_repeat('<i class="ph ph-star text-sm"></i>', $rating->rating) . "</div>
                <div class='font-semibold font-mono text-xs mt-4'>{$rating->user_name}</div>
            </div>
        </div>
    ";
}
