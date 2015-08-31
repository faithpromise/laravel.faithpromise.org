@extends('layouts.page', ['title' => $study->name, 'hero_image' => $study->image])

@section('page')

    @if ($study->has_description || $study->has_meta)
        @introsection(['title' => 'About This Study'])
        @if ($study->has_meta)
            <ul class="StudyMeta">
                @if ($study->gender == 'm')
                    <li>Men's Study</li>
                @endif
                @if ($study->gender == 'f')
                    <li>Women's Study</li>
                @endif
                @if (!empty($study->weeks))
                    <li>{{ $study->weeks }} weeks</li>
                @endif
                @if (!empty($study->cost))
                    <li>{{ $study->cost }}</li>
                @endif
            </ul>
        @endif
        {{ $study->description }}
        @endintrosection
    @endif

    @textsection(['title' => 'Times &amp; Registration', 'class' => 'Section--lightGrey'])

    <table class="StudiesTable">
        <thead>
            <tr>
                <th>Campus</th>
                <th>Time</th>
                <th>Starts on</th>
                <th>Register</th>
            </tr>
        </thead>
        <tbody>
            @foreach($times as $time)
                <tr>
                    <td>{{ $time->campus->name }}</td>
                    <td>{{ $time->starts_at->format('l') }}s at {{ $time->starts_at->format('g:i A') }}</td>
                    <td>{{ $time->starts_at->format('F j') }}</td>
                    <td><a href="{{ $time->registration_url }}">Register here</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @endtextsection

    @cardsection([
        'title' => 'Looking for something else?',
        'cards' => $studies
    ])
    <p class="text-center">Check out these other opportunities to plug into a small group study near you!</p>
    @endcardsection

    <div class="Section Section--center" style="padding-top: 0;">
        <div class="Section-container">
            <a class="Button" href="{{ route('studies') }}">View All Studies</a>
        </div>
    </div>

    @include('partials.have_questions', ['email' => 'jenniferp@faithpromise.org', 'text' => 'If you have questions about a group or ways to get involved, please contact #email#', 'class' => 'Section--lightGrey'])

@endsection