<?php

namespace App\Api\Issue;

use App\Model\Repository;

/**
 * Create, update, close or comment on issues. Not that "issue" also refers to a
 * pull request.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
interface IssueApi
{
    /**
     * Open new issue or update existing issue.
     */
    public function open(Repository $repository, string $title, string $body, array $labels);

    public function show(Repository $repository, $issueNumber): array;

    public function commentOnIssue(Repository $repository, $issueNumber, string $commentBody);

    public function lastCommentWasMadeByBot(Repository $repository, $number): bool;

    public function findStaleIssues(Repository $repository, \DateTimeImmutable $noUpdateAfter): iterable;

    /**
     * Close an issue and mark it as "not_planned".
     */
    public function close(Repository $repository, $issueNumber): void;
}
