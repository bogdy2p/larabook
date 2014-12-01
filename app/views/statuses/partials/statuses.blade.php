@forelse($statuses as $status)
        @include('statuses.partials.status')
    @empty      
    <p> This user has no statuses yet.</p>
@endforelse
