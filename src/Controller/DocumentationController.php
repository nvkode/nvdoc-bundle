<?php

/**
 * NvdocBundle
 * PHP Version >= 8.1
 *
 * @category Nvdoc
 * @package  NvdocBundle
 * @author   Mykyta Melnyk <liswelus@gmail.com>
 * @license  MIT <https://github.com/nvkode/nvdoc-bundle/blob/development/LICENSE>
 * @link     https://github.com/nvkode/nvdoc-bundle
 */

declare(strict_types=1);

namespace Nvkode\NvdocBundle\Controller;

use Nvkode\Nvdoc\Nvdoc;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * DocumentationController Class
 *
 * @category Controller
 * @package  NvdocBundle
 * @author   Mykyta Melnyk <liswelus@gmail.com>
 * @license  MIT <https://github.com/nvkode/nvdoc-bundle/blob/development/LICENSE>
 * @link     https://github.com/nvkode/nvdoc-bundle
 */
#[Route(
    name: 'nvdoc_'
)]
class DocumentationController extends AbstractController
{

    /**
     * Render base docs template and return Response.
     *
     * @param Request $request Symfony Request
     *
     * @return Response
     */
    #[Route(
        path: '/docs',
        name: 'read',
        methods: ['GET']
    )]
    public function read(Request $request): Response
    {
        // Get documentation about all files in src dir.
        $projectDir = $this->getParameter('kernel.project_dir');

        if (is_string($projectDir) === true) {
            $data = (new Nvdoc($projectDir))->getFilesInformation(
                sprintf("%s/%s", $projectDir, 'src')
            );
        } else {
            $data = [];
        }

        // Create navigation from data.
        $navigation = $this->_arrayToTree(array_keys($data));

        // Get namespace name from request.
        $currentNamespace = $request->get('namespace');
        $namespaceDoc     = null;

        // Set up current namespace.
        if ($currentNamespace !== null
            && trim($currentNamespace) !== ''
            && array_key_exists($currentNamespace, $data) === true
        ) {
            $namespaceDoc = $data[$currentNamespace];
        }

        return $this->render(
            '@Nvdoc/read.html.twig',
            [
                'data'             => $data,
                'namespaceDoc'     => $namespaceDoc,
                'currentNamespace' => $currentNamespace,
                'navigation'       => $navigation,
            ]
        );

    }


    /**
     * Parse classes with data into tree structure.
     *
     * @param string[] $data List of all classes with data
     *
     * @return array<string, mixed>
     */
    private function _arrayToTree(array $data): array
    {
        $navigation = [];

        foreach ($data as $item) {
            $exploded = explode("\\", $item);
            $count    = count($exploded);
            $last     = &$navigation;

            for ($i = 0; $i < $count; $i++) {
                $part = $exploded[$i];

                if (($i + 1) < $count) {
                    $last = &$last[$part];
                    continue;
                }

                $last[$part] = $item;
            }
        }

        return $navigation;

    }

}