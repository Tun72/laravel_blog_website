@php
    $noti_option = [
        "comment" => "commented on your subscribed blogs.",
        "update" => "update your subscribed blogs.",
        "create" => "create new blogs."
    ]
@endphp

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-position">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (count($notifications))
                    <div class="list-group">
                        @foreach ($notifications as $noti)
                            <a href="/blogs/{{ $noti->blog?->slug }}?noti_id={{ $noti->id }}"
                                class="list-group-item list-group-item-action p-3 d-flex gap-3 align-items-center noti-active"
                                aria-current="true">

                                <div class="ms-2 me-auto d-flex flex-column">
                                    <span>{{ $noti->user->name . " " . $noti_option[$noti->type]}}</span>
                                    <span class="small">{{ $noti->created_at }}</span>
                                </div>
                                @if (!$noti->is_seen)
                                    <span class="bg-primary rounded-pill rounded-circle shadow-lg"
                                        style="width: 12px; height: 12px">&nbsp;</span>
                                @endif
                            </a>
                        @endforeach

                    </div>
                @else
                    <p class="text-danger">No notification.</p>
                @endif
            </div>
        </div>
    </div>
</div>
