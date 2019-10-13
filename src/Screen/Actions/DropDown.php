<?php

declare(strict_types=1);

namespace Orchid\Screen\Actions;

use Orchid\Screen\Action;
use Orchid\Screen\Repository;
use Orchid\Screen\Contracts\ActionContract;

/**
 * Class DropDown.
 *
 * @method DropDown name(string $name = null)
 * @method DropDown modal(string $modalName = null)
 * @method DropDown icon(string $icon = null)
 * @method DropDown class(string $classes = null)
 */
class DropDown extends Action
{
    /**
     * @var string
     */
    protected $view = 'platform::actions.dropdown';

    /**
     * Default attributes value.
     *
     * @var array
     */
    protected $attributes = [
        'class' => 'btn btn-link',
        'source' => null,
        'icon'  => null,
        'list'  => [],
    ];

    /**
     * Create instance of the button.
     *
     * @param string $name
     *
     * @return DropDown
     */
    public static function make(string $name  = ''): DropDown
    {
        return (new static())
            ->name($name)
            ->addBeforeRender(function () use ($name) {
                $this->set('name', $name);
            });
    }

    /**
     * @param ActionContract[] $list
     *
     * @return DropDown
     */
    public function list(array $list) : DropDown
    {
        return $this->set('list', $list);
    }

    /**
     * @param Repository $repository
     *
     * @throws \Throwable
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function build(Repository $repository = null)
    {
        $this->set('source', $repository);

        return $this->render();
    }
}
