<?php
/**
 * This file is part of the Borobudur package.
 *
 * (c) 2017 Borobudur <http://borobudur.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Borobudur\Component\Collection;

use ArrayAccess;
use Closure;
use Countable;
use Doctrine\Common\Collections\Criteria;
use IteratorAggregate;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
interface CollectionInterface extends Countable, IteratorAggregate, ArrayAccess
{
    /**
     * Add element at the end of collection.
     *
     * @param mixed $element
     */
    public function add($element): void;

    /**
     * Clears the collection, removing all elements.
     */
    public function clear(): void;

    /**
     * Check whether the collection is empty (contains no elements)
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Remove the element at the specified index from the collection.
     *
     * @param int $index
     */
    public function remove(int $index): void;

    /**
     * Remove the specified element from the collection, if it is found.
     *
     * @param mixed $element
     */
    public function removeElement($element): void;

    /**
     * Check whether an element is contained in the collection.
     *
     * @param mixed $element
     *
     * @return bool
     */
    public function contains($element): bool;

    /**
     * Gets the element at the specified index.
     *
     * @param int $index
     *
     * @return mixed
     */
    public function get(int $index);

    /**
     * Sets an element in the collection at the specified index.
     *
     * @param int   $key
     * @param mixed $value
     */
    public function set(int $key, $value): void;

    /**
     * Sets the internal iterator to the first element in the collection and
     * returns this elements.
     *
     * @return mixed
     */
    public function first();

    /**
     * Sets the internal iterator to the last element in the collection and
     * returns this element.
     *
     * @return mixed
     */
    public function last();

    /**
     * Returns all the elements of this collection that satisfy the predicate.
     *
     * @param Closure $predicate
     *
     * @return CollectionInterface|static
     */
    public function filter(Closure $predicate): CollectionInterface;

    /**
     * Applies the given mapper to each element in the collection an returns a
     * new collection with the elements returned by mapper.
     *
     * @param Closure $mapper
     *
     * @return CollectionInterface|static
     */
    public function map(Closure $mapper): CollectionInterface;

    /**
     * Check the underlying collection.
     *
     * @param int $size
     *
     * @return CollectionInterface|static
     */
    public function chunk(int $size): CollectionInterface;

    /**
     * Gets the index of a given element. The comparison of two elements is
     * strict, that means not only the value but also the type must match. For
     * objects this means reference equality.
     *
     * @param mixed $element
     *
     * @return int
     */
    public function indexOf($element): int;

    /**
     * Gets total elements in collection.
     *
     * @return int
     */
    public function count(): int;

    /**
     * @param Criteria $criteria
     *
     * @return CollectionInterface|static
     */
    public function matching(Criteria $criteria): CollectionInterface;

    /**
     * @return array
     */
    public function toArray(): array;
}
