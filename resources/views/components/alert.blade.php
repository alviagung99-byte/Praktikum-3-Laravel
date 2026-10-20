<div style="
    padding: 1rem 1.25rem;
    border: 2px solid {{ $type === 'error' ? '#fca5a5' : ($type === 'warning' ? '#fcd34d' : '#6ee7b7') }};
    border-radius: 12px;
    background: {{ $type === 'error' ? '#fef2f2' : ($type === 'warning' ? '#fffbeb' : '#ecfdf5') }};
    color: {{ $type === 'error' ? '#991b1b' : ($type === 'warning' ? '#92400e' : '#065f46') }};
    display: flex;
    align-items: flex-start;
    gap: .75rem;
    margin-bottom: 1.25rem;
">
    <span style="font-size: 1.2rem; flex-shrink: 0;">
        {{ $type === 'error' ? '🔴' : ($type === 'warning' ? '🟡' : '✅') }}
    </span>
    <div>
        <strong>{{ ucfirst($type) }}:</strong> {{ $message }}
    </div>
</div>
