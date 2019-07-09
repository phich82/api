<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SupportManyPrimaryKeys
{
    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $primaryKeyNames = $this->getKeyName();
        if (!is_array($primaryKeyNames)) {
            return parent::setKeysForSaveQuery($query);
        }
        foreach ($primaryKeyNames as $pKey) {
            $query->where($pKey, '=', $this->getKeyForSaveQuery($pKey));
        }
        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param string|null $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($primaryKeyName = null)
    {
        $primaryKeyName = $primaryKeyName ?: $this->getKeyName();
        return $this->original[$primaryKeyName] ?? $this->getAttribute($primaryKeyName);
    }
}
