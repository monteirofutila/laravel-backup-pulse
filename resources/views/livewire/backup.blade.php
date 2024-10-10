<x-pulse::card :cols="$cols" :rows="$rows" :class="$class" wire:poll.5s="">
    <x-pulse::card-header name="Backups">
        <x-slot:icon>
            <x-pulse::icons.circle-stack />
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand">

        {{-- Backup Summary --}}
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
                @foreach ($backup['backup-statuses'] as $status)
                    <tr class="h-2 first:h-0"></tr>
                    <tr>
                        <x-pulse::td>{{ $status['name'] }}</x-pulse::td>
                        <x-pulse::td>{{ $status['disk'] }}</x-pulse::td>
                        <x-pulse::td>{{ $status['healthy'] }}</x-pulse::td>
                        <x-pulse::td>{{ $status['amount'] }}</x-pulse::td>
                        <x-pulse::td>{{ $status['newest'] }}</x-pulse::td>
                        <x-pulse::td>{{ $status['usedStorage'] }}</x-pulse::td>
                    </tr>
                @endforeach
            </tbody>
        </x-pulse::table>

        {{-- Backup Summary --}}
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
                @foreach ($backup['backups'] as $backup)
                    <tr class="h-2 first:h-0"></tr>
                    <tr>
                        <x-pulse::td>{{ $backup['path'] }}</x-pulse::td>
                        <x-pulse::td>{{ $backup['disk'] }}</x-pulse::td>
                        <x-pulse::td>{{ $backup['date'] }}</x-pulse::td>
                        <x-pulse::td>{{ $backup['size'] }}</x-pulse::td>
                    </tr>
                @endforeach
            </tbody>
        </x-pulse::table>
    </x-pulse::scroll>
</x-pulse::card>
