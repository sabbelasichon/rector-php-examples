<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Php70\Rector\FuncCall\MultiDirnameRector;
use Rector\Php70\Rector\If_\IfToSpaceshipRector;
use Rector\Php70\Rector\Ternary\TernaryToNullCoalescingRector;
use Rector\Php71\Rector\BooleanOr\IsIterableRector;
use Rector\Php71\Rector\ClassConst\PublicConstantVisibilityRector;
use Rector\Php71\Rector\List_\ListToArrayDestructRector;
use Rector\Php71\Rector\TryCatch\MultiExceptionCatchRector;
use Rector\Php73\Rector\BooleanOr\IsCountableRector;
use Rector\Php73\Rector\ConstFetch\SensitiveConstantNameRector;
use Rector\Php73\Rector\FuncCall\SetCookieRector;
use Rector\Php73\Rector\FuncCall\StringifyStrNeedlesRector;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Php80\Rector\Class_\StringableForToStringRector;
use Rector\Php80\Rector\FunctionLike\UnionTypesRector;
use Rector\Php80\Rector\Identical\StrEndsWithRector;
use Rector\Php80\Rector\Identical\StrStartsWithRector;
use Rector\Php80\Rector\If_\NullsafeOperatorRector;
use Rector\Php80\Rector\NotIdentical\StrContainsRector;
use Rector\Php80\Rector\Switch_\ChangeSwitchToMatchRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [__DIR__.'/src']);
    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_80);

    $containerConfigurator->import(SetList::PHP_80);
    $services = $containerConfigurator->services();

    // Useful sets to explore
//    $containerConfigurator->import(SetList::DEAD_CODE);
//    $containerConfigurator->import(SetList::NAMING);
//    $containerConfigurator->import(SetList::CODING_STYLE);
//    $containerConfigurator->import(SetList::CODE_QUALITY);
//    $containerConfigurator->import(SetList::PHP_70);
//    $containerConfigurator->import(SetList::PHP_71);
//    $containerConfigurator->import(SetList::PHP_72);
//    $containerConfigurator->import(SetList::PHP_73);
//    $containerConfigurator->import(SetList::PHP_74);
//    $containerConfigurator->import(SetList::PHP_80);


    // Nice rules to apply for our custom code
    $services->set(IfToSpaceshipRector::class);
    $services->set(MultiDirnameRector::class);
    $services->set(TernaryToNullCoalescingRector::class);
    $services->set(IsIterableRector::class);
    $services->set(MultiExceptionCatchRector::class);
    $services->set(ListToArrayDestructRector::class);
    $services->set(PublicConstantVisibilityRector::class);
    $services->set(IsCountableRector::class);
    $services->set(SensitiveConstantNameRector::class);
    $services->set(SetCookieRector::class);
    $services->set(StringifyStrNeedlesRector::class);
    $services->set(ClosureToArrowFunctionRector::class);
    $services->set(TypedPropertyRector::class);
    $services->set(ChangeSwitchToMatchRector::class);
    $services->set(StringableForToStringRector::class);
    $services->set(UnionTypesRector::class);
    $services->set(ClassPropertyAssignToConstructorPromotionRector::class);
    $services->set(NullsafeOperatorRector::class);
    $services->set(StrContainsRector::class);
};
