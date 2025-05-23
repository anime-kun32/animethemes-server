<?php

declare(strict_types=1);

namespace App\Filament\Resources\List\Playlist\Pages;

use App\Filament\HeaderActions\Models\List\AssignHashidsHeaderAction;
use App\Filament\HeaderActions\Models\List\FixPlaylistHeaderAction;
use App\Filament\Resources\Base\BaseViewResource;
use App\Filament\Resources\List\Playlist;
use App\Models\List\Playlist as PlaylistModel;
use Filament\Actions\ActionGroup;

/**
 * Class ViewPlaylist.
 */
class ViewPlaylist extends BaseViewResource
{
    protected static string $resource = Playlist::class;

    /**
     * Get the header actions available.
     *
     * @return array
     *
     * @noinspection PhpMissingParentCallCommonInspection
     */
    protected function getHeaderActions(): array
    {
        return [
            ...parent::getHeaderActions(),

            ActionGroup::make([
                AssignHashidsHeaderAction::make('assign-hashids')
                    ->setConnection('playlists')
                    ->authorize('update', PlaylistModel::class),

                FixPlaylistHeaderAction::make('fix-playlist'),
            ]),
        ];
    }
}
