<x-pulse::card :cols="$cols" :rows="$rows" :class="$class" wire:poll.5s="">
    <x-pulse::card-header name="Backups">
        <x-slot:icon>
            <x-pulse::icons.circle-stack />
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand">

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
                        <x-pulse::td>{{ $backupStatus['healthy'] }}</x-pulse::td>
                        <x-pulse::td>
                            @if ($backupStatus['healthy'])
                                <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" height="24px">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 0 17.07 2.93 10 10 0 0 0 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM4 10l2-2 3 3 5-5 2 2-7 7-5-5z"
                                        fill="var(--success)" fill-rule="evenodd" />
                                </svg>
                            @else
                                <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" height="24px">
                                    <path
                                        d="M11.41 10l2.83-2.83-1.41-1.41L10 8.59 7.17 5.76 5.76 7.17 8.59 10l-2.83 2.83 1.41 1.41L10 11.41l2.83 2.83 1.41-1.41L11.41 10zm-8.48 7.07A10 10 0 1 0 17.07 2.93 10 10 0 0 0 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66z"
                                        fill="var(--danger)" fill-rule="evenodd" />
                                </svg>
                            @endif
                        </x-pulse::td>
                        <x-pulse::td>{{ $backupStatus['amount'] }}</x-pulse::td>
                        <x-pulse::td>{{ $backupStatus['newest'] }}</x-pulse::td>
                        <x-pulse::td>{{ $backupStatus['usedStorage'] }}</x-pulse::td>
                    </tr>
                @endforeach
            </tbody>
        </x-pulse::table>

        {{-- Backup Files Summary --}}
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
                @else
                    <x-pulse::no-results />
                @endforeach
            </tbody>
        </x-pulse::table>
    </x-pulse::scroll>
</x-pulse::card>
