<div>
    <form action="{{ route('ideas.like',$idea->id) }}" method="POST">
        @csrf
        <a href="#" class="fw-light nav-link fs-6">
            <span class="fas fa-heart me-1"></span> {{ $idea->likes()->count() }}
        </a>
    </form>
</div>
