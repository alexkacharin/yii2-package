<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    [
                        'label' => 'Настройки',

                        'icon' => 'cog',
                        'items' => [
                            ['label' => 'Пользователи', 'url' => ['/user/admin/index'], 'icon' => 'male']
                        ]
                    ],
                ],
            ]
        ) ?>
    </section>
</aside>