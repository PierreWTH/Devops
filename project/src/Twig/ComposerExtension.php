<?php

namespace App\Twig;

use Symfony\Component\HttpKernel\KernelInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ComposerExtension extends AbstractExtension
{
    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('composer_version', [$this, 'getComposerVersion']),
        ];
    }

    public function getComposerVersion(): ?string
    {
        $composerJsonPath = $this->kernel->getProjectDir().'/composer.json';
        if (file_exists($composerJsonPath)) {
            $composerJson = json_decode(file_get_contents($composerJsonPath), true);
            return $composerJson['version'] ?? null;
        }
        return null;
    }
}