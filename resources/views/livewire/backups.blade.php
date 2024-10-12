<x-pulse::card :cols="$cols" :rows="$rows" :class="$class" wire:poll.5s="">
    <x-pulse::card-header name="Backups">
        <x-slot:icon>
            <x-pulse::icons.circle-stack />
        </x-slot:icon>
    </x-pulse::card-header>

    @empty($backups)
        <x-pulse::no-results />
    @else
        {{-- Backup Statuses Summary --}}
        <x-pulse::table>
            <x-pulse::thead>
                <tr>
                    <x-pulse::th>Name</x-pulse::th>
                    <x-pulse::th>Disk</x-pulse::th>
                    <x-pulse::th>Healthy</x-pulse::th>
                    <x-pulse::th>Amount</x-pulse::th>
                    <x-pulse::th>Newest</x-pulse::th>
                    <x-pulse::th>Used Storage</x-pulse::th>
                </tr>
            </x-pulse::thead>
            <tbody>
                @foreach ($backups['backup-statuses'] as $backupStatus)
                    <tr class="h-2 first:h-0"></tr>
                    <tr>
                        <x-pulse::td>{{ $backupStatus['name'] }}</x-pulse::td>
                        <x-pulse::td>{{ $backupStatus['disk'] }}</x-pulse::td>
                        <x-pulse::td>{{ $backupStatus['healthy'] ? '✅' : '❌' }}</x-pulse::td>
                        <x-pulse::td>{{ $backupStatus['amount'] }}</x-pulse::td>
                        <x-pulse::td>{{ $backupStatus['newest'] }}</x-pulse::td>
                        <x-pulse::td>{{ $backupStatus['usedStorage'] }}</x-pulse::td>
                    </tr>
                @endforeach
            </tbody>
        </x-pulse::table>

        {{-- Backup Files Summary --}}
        <x-pulse::scroll :expand="$expand">
            @if (count($backups['files']))
                <x-pulse::table class="mt-4">
                    <x-pulse::thead>
                        <tr>
                            <x-pulse::th>Path</x-pulse::th>
                            <x-pulse::th>Disk</x-pulse::th>
                            <x-pulse::th>Date</x-pulse::th>
                            <x-pulse::th>Size</x-pulse::th>
                        </tr>
                    </x-pulse::thead>
                    <tbody>
                        @foreach ($backups['files'] as $file)
                            <tr class="h-2 first:h-0"></tr>
                            <tr>
                                <x-pulse::td>{{ $file['path'] }}</x-pulse::td>
                                <x-pulse::td>{{ $file['disk'] }}</x-pulse::td>
                                <x-pulse::td>{{ $file['date'] }}</x-pulse::td>
                                <x-pulse::td>{{ $file['size'] }}</x-pulse::td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-pulse::table>
            @else
                <x-pulse::no-results />
            @endif
        </x-pulse::scroll>
    @endempty
</x-pulse::card>
